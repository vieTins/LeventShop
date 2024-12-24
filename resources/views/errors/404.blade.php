<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Error</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>
<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

.container {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  padding-left: 175px;
}

.container>img {
  padding-right: 175px;
}

.error {
  width: 50%;
  text-align: left;
  margin-right: 2rem;
}

h1 {
  font-size: 36px;
  font-weight: 600;
  color: #2d2b2b;
  margin-top: 2rem;
}

p {
  font-size: 20px;
  font-family: "eurostile", sans-serif;
  margin-top: 1rem;
  line-height: 1.5;
}

.cta {
  font-weight: 500;
  margin-top: 2rem;
}

.cta-back {
  padding: 12px 20px;
  font-size: 18px;
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  text-decoration: none;
  position: relative;
  overflow: hidden;
}

.cta-back::before {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.1);
  transition: transform 0.3s ease;
}

.cta-back:hover::before {
  transform: translateX(100%);
}

.cta-back:hover {
  transform: scale(1.1);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.cta-back:active {
  transform: scale(0.9);
  transition: transform 0.2s ease;
}

.hero-img {
  height: 70vh;
  animation: MoveUpDown 2s ease-in-out infinite alternate-reverse both;
}

@keyframes MoveUpDown {
  0% {
    transform: translateY(10px);
  }

  100% {
    transform: translateY(-10px);
  }
}

@media (max-width: 768px) {
  .container {
    flex-direction: column;
  }

  .error {
    width: 80%;
    margin-right: 0;
    margin-bottom: 2rem;
    text-align: justify;
  }
}
</style>
<body>
  <section class="container">
    <div class="error">
      <h1>Uh Ohh!</h1>
      <p>We couldn't find the page that you're looking for :(</p>
      <div class="cta">
        <button class="cta-back" href="#">Go Back</button>
      </div>
    </div>
    <img src="https://github.com/smthari/404-page-using-html-css/blob/Starter/Images/404.png?raw=true" alt="home image" class="hero-img" />
  </section>
</body>

</html>