<?php
require_once('class/Result.php');
require_once('class/Hand.php');

if (isset($_POST['hand'])) {
    $ownHand = Hand::generateHandByType($_POST['hand']);
    $computerHand = Hand::generateRandomHand();
    $result = $ownHand->battle($computerHand);
}
?>

<!DOCTYPE html>
<html lang="ja-JP">
<head>
    <title>じゃんけんゲーム</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
    <h1>じゃんけんゲーム</h1>
    <?php if (isset($_POST['hand'])) { ?>
        <div class="game-panel">
            <div class="own-hand">
                <h2>あなたの手</h2>
                <div class="hand-text-box">
                    <img class="hand-image" src="<?php echo $ownHand->getImagePath(); ?>">
                </div>
            </div>
            <div class="result">
                <div class="result-text">
                    <?php echo $result->getText(); ?>
                </div>
            </div>
            <div class="computer-hand">
                <h2>コンピューター</h2>
                <div class="hand-text-box">
                    <img class="hand-image" src="<?php echo $computerHand->getImagePath(); ?>">
                </div>
            </div>
            <div class="clear"></div>
        </div>
    <?php } else { ?>
        <div class="game-panel">
            <div class="own-hand">
                <h2>あなたの手</h2>
                <div class="hand-text-box">
                    <div class="hand-text">手を選んでください。</div>
                </div>
            </div>
            <div class="result">

            </div>
            <div class="computer-hand">
                <h2>コンピューター</h2>
                <div class="hand-text-box">

                </div>
            </div>
            <div class="clear"></div>
        </div>
    <?php } ?>
    <div class="form-wrapper">
        <form method="POST" action="/">
            <div class="form-hands">
                <input id="rock" type="radio" name="hand" value="0"><label for="rock">グー</label>
                <input id="scissors" type="radio" name="hand" value="1"><label for="scissors">チョキ</label>
                <input id="paper" type="radio" name="hand" value="2"><label for="paper">パー</label>
            </div>
            <button class="submit-button">決定!</button>
        </form>
    </div>
</div>
</body>
</html>
