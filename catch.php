<?php

include 'function.php';

try {
//    password_hash() 已经帮你处理好了加盐。加进去的随机子串通过加密算法自动保存着，成为哈希的一部分。
//    password_verify() 会把随机子串从中提取，所以你不必使用另一个数据库来记录这些随机子串。
    
    $passwordHash = password_hash('secret-password', PASSWORD_DEFAULT);
    
    if (password_verify('secret-password', $passwordHash)) {
         echo 'Correct Password';
    } else {
        echo 'Wrong password';
    }
    
    
    
    die;
    
    
    throw new \Exception('1');
} catch (\Exception $e) {
    p($e);
} finally {
    // 无论抛出什么样的异常都会执行，并且在正常程序继续之前执行
    p(1);
}