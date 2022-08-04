from typing import List


def joinList(list: List[str]) -> str:
    """Function to join a list of characters to string
    doctests:
    >>> joinList(['R', 'i', 't', 'u'])
    'Ritu'
    >>> joinList(['R', 'i', 't', 'u', 'p', 'a', 'r', 'n', 'a'])
    'Rituparna'
    """
    return "".join(list)


if __name__ == "__main__":
    import doctest

    doctest.testmod()
