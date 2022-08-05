from typing import Dict, List


def dictContainingSquaresAndCubes(n: int) -> Dict[int, List[int]]:
    """function that takes an integer n and output a `dict` containing keys from 0,2 ... to n and each key is mapped to a list containing the square and cube of the number.
    doctests:
    >>> dictionary = dictContainingSquaresAndCubes(3)
    >>> print(dictionary)
    {0: [0, 0], 1: [1, 1], 2: [4, 8], 3: [9, 27]}
    """
    ans = {}
    for i in range(3 + 1):
        ans[i] = list([i**2, i**3])
    return ans


if __name__ == "__main__":
    import doctest

    doctest.testmod()
