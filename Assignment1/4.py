from typing import List


def sortDescending(inputList: List[int]) -> None:
    """Function to sort a list descending
    doctests:
    >>> ls = [6,2,7,9]
    >>> sortDescending(ls)
    >>> print(ls)
    [9, 7, 6, 2]
    """
    inputList.sort(reverse=True)


if __name__ == "__main__":
    import doctest

    doctest.testmod()

    ls = [1, 2, 3, 4, 6]
    sortDescending(ls)
    print(ls)
