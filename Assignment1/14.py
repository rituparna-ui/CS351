from functools import reduce
from typing import List


def reduceToFactorial(ls: List[int]) -> int:
    """Write a function to find the product of all the numbers in a list
    doctests:
    >>> print(reduceToFactorial([1,2,3,4,5]))
    120
    """
    return reduce(lambda a, b: a * b, ls)


if __name__ == "__main__":
    import doctest

    doctest.testmod()
