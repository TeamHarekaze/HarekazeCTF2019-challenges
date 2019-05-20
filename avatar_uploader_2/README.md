# [Web 300] Avatar Uploader 2
## Description
アイコンをアップロードできるだけのAvatar Uploaderというサービスを作りました。もしよかったら脆弱性がないか確認していただけませんか。

ヒント: https://php.net/manual/ja/function.password-hash.php

---

I made a web application called Avatar Uploader, which you can upload avatars. Could you please try to find vulnerabilities?

Hint: https://www.php.net/manual/en/function.password-hash.php

---

`http://(redacted)` ([server/Dockerfile](server/Dockerfile))

- [avatar-uploader.tar.xz](attachments/avatar-uploader.tar.xz)

## Solution
- (ja) [Harekaze CTF 2019 で出題した問題の解説 - st98 の日記帳](https://st98.github.io/diary/posts/2019-05-21-harekaze-ctf-2019.html#web-300-avatar-uploader-2)

## Flag
```
HarekazeCTF{lfi_with_phar_is_fun}
```