<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <style>
    body {
      margin: 0;
      overflow: hidden;
    }

    .scroll-container {
      position: relative;
      width: 100vw;
      height: 100vh;
      overflow: auto;
      margin-bottom: 20px; /* Spazio tra i container */
    }

    .content {
      width: 200%;
      height: 200%;
      background-color: #f0f0f0;
    }

    .arrow {
      position: fixed;
      cursor: pointer;
      transition: opacity 0.3s ease-in-out;
      background-color: black;
      color: white;
        padding: 2px;
        font-size: 150%;
        border-radius: 1000px;
        width: 30px;
        height: 30px;
        text-align: center;
    }

    .arrow-up {
      top: 10px;
      left: 50%;
      top: 0;
      margin-top: 10px;
      transform: translateX(-50%);
    }

    .arrow-down {
      bottom: 10px;
      left: 50%;
      bottom: 0;
      margin-bottom: 10px;
      transform: translateX(-50%);
    }

    .arrow-left {
      top: 50%;
      left: 10px;
      left: 0;
      margin-left: 10px;
      transform: translateY(-50%);
    }

    .arrow-right {
      top: 50%;
      right: 10px;
      right: 0;
      margin-right: 10px;
      transform: translateY(-50%);
    }
  </style>
</head>
<body>
  <div class="scroll-container">
    <div class="content"></div>
    <div class="arrow arrow-up" style="opacity: 0;">↑</div>
    <div class="arrow arrow-down" style="opacity: 1;">↓</div>
    <div class="arrow arrow-left" style="opacity: 0;">←</div>
    <div class="arrow arrow-right" style="opacity: 0;">→</div>
  </div>

  <script>
    $(document).ready(function() {
      $('.scroll-container').each(function() {
        const $container = $(this);
        const $content = $container.find('.content');
        const $arrows = $container.find('.arrow');

        $container.on('scroll', function() {
          const scrollY = $container.scrollTop();
          const scrollX = $container.scrollLeft();

          $arrows.each(function() {
            const $arrow = $(this);
            $arrow.css('opacity', 1);

            if (scrollY === 0 && $arrow.hasClass('arrow-up')) {
              $arrow.css('opacity', 0);
            }

            if (scrollY + $container.innerHeight() >= $content.innerHeight() && $arrow.hasClass('arrow-down')) {
              $arrow.css('opacity', 0);
            }

            if (scrollX === 0 && $arrow.hasClass('arrow-left')) {
              $arrow.css('opacity', 0);
            }

            if (scrollX + $container.innerWidth() >= $content.innerWidth() && $arrow.hasClass('arrow-right')) {
              $arrow.css('opacity', 0);
            }
          });
        });
      });
    });
  </script>
</body>
</html>
