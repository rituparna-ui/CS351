from typing import Dict, List


def countOccurrences(inputList: List[int]) -> Dict[int, int]:
    """Function to get frequency of each numbers in a list of numbers.
    doctests:
    >>> inputList = [1, 2, 1, 2, 4, 3, 3]
    >>> frequencyMap = countOccurrences(inputList)
    >>> print(frequencyMap)
    {1: 2, 2: 2, 4: 1, 3: 2}
    """
    answer = {}
    for i in inputList:
        if i in answer.keys():
            answer[i] = answer[i] + 1
        else:
            answer[i] = 1

    return answer


if __name__ == "__main__":
    import doctest

    doctest.testmod()
