#!/bin/bash
sudo yum update -y
sudo yum install -y httpd.x86_64 awscli
sudo systemctl start httpd.service
sudo systemctl enable httpd.service
usermod -a -G apache ec2-user
chown -R ec2-user:apache /var/www
chmod 2775 /var/www
mkdir ~/.aws
echo "[default]\nregion = ap-south-1" > ~/.aws/config
echo "[default]\naws_access_key_id = AKIAUZJT4AHPHBBG2TXQ\naws_secret_access_key = 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" > ~/.aws/credentials
aws s3 cp s3://xd-dead/ /var/www/html --recursive