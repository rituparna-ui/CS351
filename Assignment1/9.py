from typing import List


def zipElements(list1: List, list2: List) -> List:
    """Function to zip two lists
    doctests:
    >>> list1 = [1, 2, 3]
    >>> list2 = [4, 5, 6]
    >>> print(zipElements(list1, list2))
    [(1, 4), (2, 5), (3, 6)]
    """
    return list(zip(list1, list2))


if __name__ == "__main__":
    import doctest

    doctest.testmod()
