<?php
function isUserExist($email = null)
{
    global $pdo;
    $sql = "SELECT * from `users` WHERE email = :email;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email ?? '']);
    $record =  $stmt->fetch(PDO::FETCH_OBJ);
    return $record ? true : false;
}
function createUser(array $userData){
    global $pdo;
    $sql = "INSERT INTO `users` (`name`,`email`) VALUES (:name , :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name'=> $userData['username'] ,'email'=> $userData['email']]);
    return $stmt->rowCount();
}

function createLoginToken(): array
{
    global $pdo;
    $token = rand(100000, 999999);
    $hash = bin2hex(random_bytes(8));
    $expired_at = time() + 300;

    // INSERT INTO `tokens` (`id`, `token`, `hash`, `expired_at`) VALUES (NULL, '098765', 'poijhbnm', '2024-09-02 23:20:06.000000');

    $sql = "INSERT INTO `tokens` (`token`, `hash`, `expired_at`) VALUES (:token, :hash, :expired_at)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':token' => $token, ':hash' => $hash, ':expired_at' => date("Y-m-d H:i:s", $expired_at)]);
    return [
        'token' => $token,
        'hash' => $hash
    ];
}

function isAliveToken(string $hash): bool
{
    $record = findTokenByHash($hash);
    if (!$record)
        return false;
    return strtotime($record->expired_at) > time() + 120;
}

function findTokenByHash(string $hash): object|bool
{
    global $pdo;
    $sql = "SELECT * FROM `tokens` WHERE hash = :hash;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':hash' => $hash]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function sendTokenByEmail(string $email, $token): bool
{
    global $mail;
    $mail->addAddress($email, 'VAREX');
    $mail->Subject = 'Sepehr GHarei verify code';
    $mail->Body = "<h2>code : $token </h2>";
    return $mail->send();
}


function changeLoginSession(string $session, $email)
{
    global $pdo;
    $sql = "UPDATE `users` SET `session` = :session WHERE `users`.`email` = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':session' => $session, ':email' => $email]);
    return $stmt->rowCount() ? true : false;
}

function deleteLoginSession(string $hash):bool
{
    global $pdo;
    $sql = "DELETE FROM `tokens` WHERE `tokens`.`hash` = :hash";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':hash' => $hash]);
    return $stmt->rowCount() ? true : false;

}