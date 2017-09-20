<h2><?php echo $title ?></h2>

<?php echo form_open('rss_feed/index') ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<select name="rss" class="form-control">
				<option value="http://www.b92.net/info/rss/tehnopolis.xml">B92</option>
				<option value="http://www.blic.rs/rss/IT">BLIC</option>
				<option value="http://www.kurir.rs/rss/zabava/">KURIR</option>
				<option value="http://feeds.reuters.com/news/artsculture">Reuters/Art</option>
				<option value="http://feeds.reuters.com/reuters/businessNews">Reuters/Business</option>
				<option value="http://feeds.reuters.com/reuters/companyNews">Reuters/Company</option>
				<option value="http://feeds.reuters.com/reuters/entertainment">Reuters/Entertainment</option>
				<option value="http://feeds.reuters.com/reuters/environment">Reuters/Environment</option>
				<option value="http://feeds.reuters.com/reuters/healthNews">Reuters/Health</option>
				<option value="http://feeds.reuters.com/reuters/lifestyle">Reuters/Lifestyle</option>
				<option value="http://feeds.reuters.com/news/wealth">Reuters/Wealth</option>
				<option value="http://feeds.reuters.com/reuters/MostRead">Reuters/MostRead</option>
				<option value="http://feeds.reuters.com/reuters/oddlyEnoughNews">Reuters/Odd</option>
				<option value="http://feeds.reuters.com/ReutersPictures">Reuters/Pictures</option>
				<option value="http://feeds.reuters.com/Reuters/PoliticsNews">Reuters/Politics</option>
				<option value="http://feeds.reuters.com/reuters/scienceNews">Reuters/Science</option>
				<option value="http://feeds.reuters.com/reuters/sportsNews">Reuters/Sport</option>
				<option value="http://feeds.reuters.com/reuters/technologyNews">Reuters/Technology</option>
				<option value="http://feeds.reuters.com/reuters/topNews">Reuters/TopNews</option>
				<option value="http://feeds.reuters.com/Reuters/domesticNews">Reuters/Domestic</option>
				<option value="http://feeds.reuters.com/Reuters/worldNews">Reuters/World</option>
				<option value="http://feeds.reuters.com/reuters/USVideoBreakingviews">Reuters/BreakingNews</option>
			</select>
		</div>
		<input class="btn btn-success" type="submit" value="RSS FEED">
	</div>
<?php echo form_close() ?>

<?php $link = $this->input->post('rss'); ?>
<?php if(isset($link)): ?>
	<?php foreach(getRSS($link) as $post): ?>
		<div class="media">
		<hr>
		  <div class="media-center">
		  <i><?php echo $post['pubDate'] ?></i>
		  <h3 class="media-heading"><?php echo $post['title'] ?></h3><br>
		  </div>
		  <div class="media-body">
		    <p><?php echo $post['description'] ?></p>
		    <a href="<?php echo $post['link'] ?>"><b>Read More...</b></a>
		  </div>
		  <hr>
		</div>
	<?php endforeach; ?>
<?php endif; ?>