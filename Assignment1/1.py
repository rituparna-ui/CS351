from typing import List


def splitString(string: str) -> List[str]:
    """Function to break down a string into a list of characters..
    doctests:
    >>> splitString("Ritu")
    ['R', 'i', 't', 'u']
    >>> splitString("Rituparna")
    ['R', 'i', 't', 'u', 'p', 'a', 'r', 'n', 'a']
    """

    return list(string)


if __name__ == "__main__":
    import doctest

    doctest.testmod()

    print(splitString("rwarwatkar"))
