# clean-up

## テストについて

[testcafe](https://testcafe.io/)を利用。`test`フォルダ以下にコードがある。

### 環境の準備

1. node.jsをインストール
1. ターミナルで `clean-up` フォルダに移動して以下を実行
    ```
    npm install
    ```
### テストの実行

```
npx testcafe chrome test
```