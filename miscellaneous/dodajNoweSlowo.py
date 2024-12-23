import os
file = open("../100_words.txt", "a")

slowo = input("Podaj nowe slowo: ")
slowo2 = ";" + slowo
file.write(slowo2)
file.close()
print("Dodano slowo: ", slowo)

file = open("./addedWords.txt", "a+")
file.write(slowo + "\n")
file.close()

#os.system("PAUSE")