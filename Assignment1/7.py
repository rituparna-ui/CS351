from typing import List


def getFirstRepeatingElement(inputList: List[int]) -> int:
    """Function to get the first repeating element from a list
    doctests:
    >>> inputList = [1, 2, 1, 1, 2, 2, 3, 4, 5, 1, 1, 2, 2]
    >>> first = getFirstRepeatingElement(inputList)
    >>> print(first)
    1
    """
    hash = set()
    for i in inputList:
        if hash.__contains__(i) == True:
            return i
        else:
            hash.add(i)
    return float("-inf")


if __name__ == "__main__":
    import doctest

    doctest.testmod()
