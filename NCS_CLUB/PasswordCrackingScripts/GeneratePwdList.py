# Generates pwd list based on parameters

# !NotJosh
def changechar(location, pwd, newchar):
    pwd[location] = newchar
    return pwd


def main():
    print("Let's generate some passwords!")
    charcount = int(input("How long is the password (fixed length): "))
    lowercase = False
    uppercase = False
    symbols = False
    numbers = False
    totalslots = 0

    lowercasealpha = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's',
                      't', 'u', 'v', 'w', 'x', 'y', 'z']
    uppercasealpha = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S',
                      'T', 'U', 'V', 'W', 'X', 'Y', 'Z']
    symbolsalpha = ['~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '-', '+', '=', '{', '[', '}',
                    ']', '|', "\\", ':', ';', '"', '\'', '<', ',', '>', '.', '?', '/']
    numbersalpha = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9']

    masterlist = []

    if input("Lowercase? y/n : ") == "y":
        lowercase = True
        totalslots += 26
        masterlist += lowercasealpha
    if input("Uppercase? y/n : ") == "y":
        uppercase = True
        totalslots += 26
        masterlist += uppercasealpha
    if input("Symbols? y/n : ") == "y":
        symbols = True
        totalslots += 32
        masterlist += symbolsalpha
    if input("Numbers? y/n : ") == "y":
        numbers = True
        totalslots += 10
        masterlist += numbersalpha
    totalcombos = pow(totalslots, charcount)

    print("Total combinations generating: " + str(totalcombos))
    print("Masterlist: " + ''.join(masterlist))

    # 26 upper case
    # 26 lower case
    # 10 numbers
    # 32 symbols

    thepwd = []
    totallist = []
    finaltotallines = []

    # init of pwd
    for x in range(0, charcount):
        thepwd += masterlist[0]


    # ''.join(list)  returns the string of a list for totallist

    for x in range(0, totalcombos-1):
        finaltotallines += ''.join(thepwd + list("\n"))
        tempint = 0
        currentchar = thepwd[tempint]

        while currentchar == masterlist[len(masterlist) - 1]:
            thepwd = changechar(tempint, thepwd, masterlist[len(masterlist) - 1])
            tempint += 1
            currentchar = thepwd[tempint]

        # this line changes the letter designated by moving it one up the scale
        thepwd = changechar(tempint, thepwd, masterlist[masterlist.index(thepwd[tempint]) + 1])

        # resets every slot before it

        if tempint != 0:
            for spot in range(0, tempint):
                thepwd = changechar(spot, thepwd, masterlist[0])

    finaltotallines += ''.join(thepwd + list("\n"))
    f = open("pwdlist.txt", "a")
    f.writelines(finaltotallines)
    f.close()


if __name__ == '__main__':
    main()
