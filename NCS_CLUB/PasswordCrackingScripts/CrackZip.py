# !NotJosh
# Cracks zip with word list
import zipfile
from zipfile import ZipFile


def main():
    file1 = open('pwdlist.txt', 'r')
    lines = file1.readlines()
    print("Starting the cracking process!")
    formattedlines = []
    for line in lines:
        formattedlines.append(line.strip())
    file_name = "Flag2.zip"
    z = ZipFile(file_name)
    for line in formattedlines:
        try:
            templine=bytes(line, 'utf-8')
            z.setpassword(templine)
            z.extract("Flag2.txt")
            print(line + " is correct")
            quit()
        except RuntimeError:
            continue
        except zipfile.BadZipfile:
            continue

    z.close()


if __name__ == '__main__':
    main()
