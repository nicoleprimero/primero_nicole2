<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Welcome to the Magic World</title>
<link rel="stylesheet" href="<?= base_url(); ?>/public/css/style.css">
<style>
/* Page Setup */
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
    background: linear-gradient(135deg, #f8e6ff, #d8b4f8);
}

.landing-page {
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* ⬅️ move content to top instead of center */
    align-items: center;
    min-height: 100vh;
    text-align: center;
    position: relative;
    color: #4b0082;
    padding-top: 80px; /* ⬅️ adjust how far from the top */
}


/* Greeting Text */
.landing-page h1 {
    font-size: 3.2rem;
    margin-bottom: 15px;
    text-shadow: 0 4px 12px rgba(0,0,0,0.25);
    opacity: 0;
    animation: fadeIn 1.5s forwards;
}

.landing-page p {
    font-size: 1.2rem;
    color: #3d0066;
    margin-bottom: 40px;
    opacity: 0;
    animation: fadeIn 2s forwards;
    animation-delay: 0.5s;
}

@keyframes fadeIn {
    to { opacity: 1; }
}

/* Magic Wand Button */
.magic-wand-btn {
    background: linear-gradient(45deg, #b57edc, #9b5edc);
    padding: 12px 22px; /* smaller size */
    border-radius: 40px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.25), 0 0 10px rgba(255, 255, 255, 0.2) inset;
    position: relative;
    z-index: 2;
}

.magic-wand-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(0,0,0,0.35), 0 0 20px rgba(255, 255, 255, 0.5) inset, 0 0 10px #fff;
}

.magic-wand-btn img {
    height: 32px;
    width: 32px;
    animation: float 2s ease-in-out infinite, sparkleGlow 1.5s infinite alternate;
}

.magic-wand-btn span {
    font-size: 1.2rem;
    font-weight: bold;
    color: #fff;
    text-shadow: 1px 1px 4px rgba(0,0,0,0.3);
}

/* Wand Floating Animation */
@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-5px) rotate(-8deg); }
}

/* Glow Animation */
@keyframes sparkleGlow {
    0% { filter: drop-shadow(0 0 2px #fff); }
    100% { filter: drop-shadow(0 0 10px #ffec85); }
}

/* Sparkle Overlay */
.landing-page::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: url('<?= base_url(); ?>/public/images/854207c5-fe3c-441a-ae78-d005ca219ff2.png') repeat;
    opacity: 0.15;
    animation: moveSparkles 20s linear infinite;
    z-index: 1;
}

@keyframes moveSparkles {
    0% { transform: translate(0,0); }
    100% { transform: translate(-50px, 50px); }
}
</style>
</head>
<body>

<div class="landing-page">
    <h1>✨ Welcome, Traveler! ✨</h1>
    <p>Step into a realm of wonder, where magic awaits at every turn.</p>
    <a href="<?= base_url(); ?>auth/login" class="magic-wand-btn">
        <img src="<?= base_url(); ?>/public/images/wand.png" alt="Magic Wand">
        <span>Begin the Journey</span>
    </a>
</div>

</body>
</html>
