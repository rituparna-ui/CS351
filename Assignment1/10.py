from typing import List


def squares(n) -> List[int]:
    """function that uses list comprehension to generate the squares of 0 to n.
    doctests:
    >>> print(squares(6))
    [0, 1, 4, 9, 16, 25, 36]
    """
    return [i**2 for i in range(n + 1)]


if __name__ == "__main__":
    import doctest

    doctest.testmod()
