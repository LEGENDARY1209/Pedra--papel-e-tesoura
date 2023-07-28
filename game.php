<?php
function getRandomChoice()
{
    $choices = ['rock', 'paper', 'scissors'];
    return $choices[array_rand($choices)];
}

function determineWinner($userChoice, $computerChoice)
{
    if ($userChoice === $computerChoice) {
        return 'tie';
    } else {
        $userWin = (
            ($userChoice === 'rock' && $computerChoice === 'scissors') ||
            ($userChoice === 'paper' && $computerChoice === 'rock') ||
            ($userChoice === 'scissors' && $computerChoice === 'paper')
        );

        return $userWin ? 'win' : 'lose';
    }
}

$userChoice = $_POST['choice'] ?? null;
$computerChoice = getRandomChoice();
$result = null;

if ($userChoice !== null) {
    $result = determineWinner($userChoice, $computerChoice);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Result</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Game Result</h1>
        <?php if ($userChoice !== null): ?>
            <p>Your choice: <?php echo ucfirst($userChoice); ?></p>
            <p>Computer's choice: <?php echo ucfirst($computerChoice); ?></p>
            <?php if ($result === 'tie'): ?>
                <h2>It's a tie!</h2>
            <?php elseif ($result === 'win'): ?>
                <h2>You win!</h2>
            <?php else: ?>
                <h2>You lose!</h2>
            <?php endif; ?>
        <?php else: ?>
            <p>No choice submitted.</p>
        <?php endif; ?>
        <a href="index.html">Play again</a>
    </div>
</body>
</html>