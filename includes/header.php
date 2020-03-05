<?php session_start(); ?>
<header id="header">
      <div class="header__top">
        <div class="container">
          <div class="header__top__logo">
            <h1><?php echo $config['title']; ?></h1>
          </div>
          <nav class="header__top__menu">
            <ul>
              <li><a href="/">Главная</a></li>
              <li><a href="pages/about_me.php">Обо мне</a></li>
              <li><a href= <?php echo $config['vk_url']; ?> target="_blank">Я Вконтакте</a></li>
            </ul>
          </nav>
        </div>
      </div>
			<?php
				$categories_q = mysqli_query($connection, "SELECT * FROM `articles_categories`");
				$categories = array();
				while ($cat = mysqli_fetch_assoc($categories_q)) {
					$categories[] = $cat;
				}
			?>
      <div class="header__bottom">
        <div class="container">
          <nav>
            <ul>
							<?php
								foreach ($categories as $cat) {
									// var_dump($cat);
									?>
										<li><a href="/articles.php?category=<?php echo $cat['id']; ?>"><?php echo $cat['category']; ?></a></li>
									<?php
								}
                if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
                  <a href="#">Войти</a>
                } else {
                  <a href="#">%$_SESSION['login'];</a>
                }
							?>
            </ul>
          </nav>
        </div>
      </div>
    </header>