from random import random
from typing import List


def generateNRandomNumbers(n: int) -> List[int]:
    """Function to generate a list of n random numbers
    doctests:
    >>> n = 10
    >>> len(generateNRandomNumbers(n))
    10
    """
    ans = []
    for i in range(n):
        ans.append(int(random() * 10))

    return ans


if __name__ == "__main__":
    import doctest

    doctest.testmod()
