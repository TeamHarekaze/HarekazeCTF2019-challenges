#!/usr/bin/env python
import sys
from Crypto.Util.number import *
from Crypto.Random.random import randint
from keys import flag

def genKey(k):
    p = getStrongPrime(k)
    g = 2
    x = randint(2, p)
    h = pow(g, x, p)

    return (p, g, h), x

def encrypt(m, pk):
    p, g, h = pk
    r = randint(2, p)

    c1 = pow(g, r, p)
    c2 = m * pow(h, r, p) % p
    return c1, c2

def decrypt(c1, c2, pk, sk):
    p = pk[0]
    m = pow(3, randint(2**16, 2**17), p) * c2 * inverse(pow(c1, sk, p), p) % p
    return m


def challenge():
    pk, sk = genKey(1024)
    m = bytes_to_long(flag)
    c1, c2 = encrypt(m, pk)

    print("Public Key :", pk)
    sys.stdout.flush()
    print("Cipher text :", (c1, c2))
    sys.stdout.flush()

    while True:
        print("---"*10, "\n")
        print("Input your ciphertext c1 : ")
        sys.stdout.flush()
        in_c1 = int(input())
        print("Input your ciphertext c2 : ")
        sys.stdout.flush()
        in_c2 = int(input())

        dec = decrypt(in_c1, in_c2, pk, sk)
        print("Your Decrypted Message :", dec)
        sys.stdout.flush()

if __name__ == "__main__":
    challenge()