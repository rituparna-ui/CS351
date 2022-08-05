from typing import Dict


def getSquaresInRange(n: int) -> Dict[int, int]:
    """Function to get dict of squares in range
    doctests:
    >>> print(getSquaresInRange(4))
    {0: 0, 1: 1, 2: 4, 3: 9, 4: 16}
    """
    return {x: x**2 for x in range(n + 1)}


if __name__ == "__main__":
    import doctest

    doctest.testmod()
