

def main():
    try:
        num = int(input("Enter a number between 1-100 \n"))
        if 0 < num <= 100:
            print("You did it!")
        else:
            print("Bad number D:")

    except:
        try:
            num = int(input("I said... a number between 1-100 \n"))
            if 0 < num <= 100:
                print("Thanks, bud!")
            else:
                print("Bad number D:")
        except:
            try:
                print("Okay. You're really bad at this! Try one more time will ya?")
                num = int(input("I said... a number between 1-100 \n"))
                if 0 < num <= 100:
                    print("Thanks, bud!")
                else:
                    print("Bad number D:")
            except:
                print("ncsctf{messingwiththecode}")
                print("")


if __name__ == '__main__':
    main()

