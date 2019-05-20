# [Misc 100] Avatar Uploader 1
## Description
アイコンをアップロードできるだけのAvatar Uploaderというサービスを作りました。アップローダーはPNG形式だけを受け付けるようにチェックをしているのですが、もしこのチェックを騙すことができればフラグを差し上げます。

---

I made a web application called Avatar Uploader, which you can upload avatars. The uploader checks types of uploaded images and only accepts PNG. However, if you could trick the check, I will give you the flag.

---

`http://(redacted)` ([server/Dockerfile](server/Dockerfile))

- [avatar-uploader.tar.xz](attachments/avatar-uploader.tar.xz)

## Solution
- (ja) [Harekaze CTF 2019 で出題した問題の解説 - st98 の日記帳](https://st98.github.io/diary/posts/2019-05-21-harekaze-ctf-2019.html#misc-100-avatar-uploader-1)

## Flag
```
HarekazeCTF{seikai_wa_hitotsu!janai!!}
```