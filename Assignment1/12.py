from typing import List


class MyClass:
    def __init__(self, numbers: List[int]):
        self.numbers = numbers

    def apply(self) -> List[int]:
        output = []
        try:
            for i in self.numbers:
                output.append(i**2)
        except Exception as e:
            print(e)
            print("Exception occured")
            return None
        return output


c1 = MyClass([1, 2, 3, 4, 5])
print(c1.apply())

c2 = MyClass(["a", "b", "c", "d", "e"])
print(c2.apply())
