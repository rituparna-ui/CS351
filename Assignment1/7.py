from typing import List


def getFirstRepeatingElement(inputList: List[int]) -> int:
    hash = set()
    for i in inputList:
        if hash.__contains__(i) == True:
            return i
        else:
            hash.add(i)
