from typing import List, Set


def uniqueElements(inputList: List[int]) -> Set:
    """function to get all the unique elements from given list.
    doctests:
    >>> inputList = [1, 2, 1, 1, 2, 2, 3, 4, 5, 1, 1, 2, 2]
    >>> uniqueSet = uniqueElements(inputList)
    >>> print(uniqueSet)
    {1, 2, 3, 4, 5}
    """
    return set(inputList)


if __name__ == "__main__":
    import doctest

    doctest.testmod()
