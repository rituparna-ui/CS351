import boto3 as boto
import time

key = ''
secret='Vcvc/'

client = boto.client('rds')

response = client.create_db_instance(
    DBName='cfm',
    AllocatedStorage=5,
    DBInstanceClass='db.t2.micro',
    DBInstanceIdentifier='mysql',
    DBParameterGroupName='default.mysql8.0',
    Engine='MySQL',
    MasterUserPassword='roottoor',
    MasterUsername='ritu',
)
print("RDS created.")
print("Waiting for RDS to be up and running")

waiter = client.get_waiter('db_instance_available')
waiter.wait(DBInstanceIdentifier='mysql')
print("RDS online")

response = client.describe_db_instances(
    DBInstanceIdentifier='mysql',
)

endpoint = response['DBInstances'][0]['Endpoint']['Address']

print("RDS DNS: %s" %endpoint)


ec2 = boto.resource('ec2')
ec2Client = boto.client('ec2')

security_group_id = "sg-"

user_data = """
    #!/bin/bash
    sudo yum update -y
    sudo yum install -y httpd php php-mysqlnd
    sudo service httpd start   
    mkdir ~/.aws && cd ~/.aws
    touch credentials && touch config
    echo "[default]" > credentials
    echo "AWS_ACCESS_KEY_ID = " >> credentials
    echo "AWS_SECRET_ACCESS_KEY = Vcvc/" >> credentials
    echo "[default]" > config
    echo "output = json" >> config
    echo "region = ap-south-1" >> config
    sudo aws s3 sync s3://ritu-cfm /var/www/html 
    sudo echo '<?php
        define("DB_SERVER", \"""" + endpoint + """:3306");
        define("DB_USER", "ritu");
        define("DB_PASSWORD", "roottoor");
        define("DB_NAME", "cfm");

        $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

        if($conn->connect_error){
            die("Connection error: ".$conn->connect_error);
        }

    ?>' > /var/www/html/config.php
"""

# Create new instance
instances = ec2.create_instances(
    ImageId='ami-',
    MinCount=1,
    MaxCount=1,
    InstanceType='t2.micro',
    SecurityGroupIds=[security_group_id],
    KeyName='lab2',
    UserData=user_data
)

instance_id = instances[0].id
print("Launching new  EC2 instance")

# Wait for instance to be into running state
waiter = ec2Client.get_waiter('instance_running')
waiter.wait(InstanceIds=[instance_id])
print("Instance running now, instance id : %s" %instance_id)

# Fetch instance details
reservations = ec2Client.describe_instances()["Reservations"]

# Open DNS in browser
for reservation in reservations:
    instance = reservation["Instances"][0]
    if instance["InstanceId"] == instance_id:
        dns = instance["PublicDnsName"]
        print("Public DNS : %s" % dns)
        time.sleep(40)



