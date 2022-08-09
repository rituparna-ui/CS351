from typing import List


def transformArray(ls: List[str]) -> List[str]:
    """function takes as input a list of words and upper-cases each word.
    doctests:
    >>> print(transformArray(["aa", "bb", "cd", "e"]))
    ['AA', 'BB', 'CD', 'E']
    """

    return list(map(lambda x: x.upper(), ls))


if __name__ == "__main__":
    import doctest

    doctest.testmod()
