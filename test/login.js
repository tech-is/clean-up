import { Selector } from 'testcafe';

fixture('ログイン')
    .page('http://localhost/clean-up/Codeigniter/welcome/login');

test('ログインテスト', async t => {
    await t
        .typeText('input[name=name]', 'testuser@clean-up.com')
        .typeText('input[name=password]', "testpass")
        .click('input[type=submit]')
        .expect(Selector('.user_data').innerText).contains('testuser');
});
