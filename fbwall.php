						<?php
								require_once('facebook.php');
								$config = array();
								$config['appId'] = '558065497596849';
								$config['secret'] = '9f2621098a283584074f3ad313f7d498';
								$config['fileUpload'] = false;
								$facebook = new Facebook($config);
								$pageid = "FlamsteedAS";
								$pagefeed = $facebook->api("/" . $pageid . "/feed");
								echo "<pre>".print_r($pagefeed)."</pre>";
					            $i = 0;
					            foreach($pagefeed['data'] as $post) {
					            	if ($post['type'] == 'status' || $post['type'] == 'link' || $post['type'] == 'photo') {
					            		echo "<div class=\"row\">";
					            		if ($post['type'] == 'status') {
					            			echo "<div class='large-2 columns'>";
					            			echo "<img src='".$post['picture']."'>";
					            			echo "</div>";
					            			echo "<div class='large-10 columns'>";
					            			echo "<h6>" . date("jS M, Y", (strtotime($post['created_time']))) . "</h6>";
					            			if (empty($post['story']) === false) {
					            				echo "<p>" . $post['story'] . "</p>";
					            			} elseif (empty($post['message']) === false) {
					            				echo "<p>" . $post['message'] . "</p>";
					            			}
					            			echo "</div>";
					            		}
					            		if ($post['type'] == 'link') {
					            			echo "<div class='large-2 columns'>";
					            			echo "<img src='".$post['picture']."'>";
					            			echo "</div>";
					            			echo "<div class='large-10 columns'>";
					            			echo "<h6>" . date("jS M, Y", (strtotime($post['created_time']))) . "</h6>";
					            			echo "<p>" . $post['name'] . "</p>";
					            			echo "<p><a href=\"" . $post['link'] . "\" target=\"_blank\">" . $post['link'] . "</a></p>";
					            			echo "</div>";
					            		}
					            		if ($post['type'] == 'photo') {
					            			echo "<div class='large-2 columns'>";
					            			echo "<img src='".$post['picture']."'>";
					            			echo "</div>";
					            			echo "<div class='large-10 columns'>";
					            			echo "<h6>" . date("jS M, Y", (strtotime($post['created_time']))) . "</h6>";
					            			if (empty($post['story']) === false) {
					            				echo "<p>" . $post['story'] . "</p>";
					            			} elseif (empty($post['message']) === false) {
					            				echo "<p>" . $post['message'] . "</p>";
					            			}	
					            			echo "<p><a href=\"" . $post['link'] . "\" target=\"_blank\">View photo &rarr;</a></p>";
					            			echo "</div>";
					            		}
					            	echo "</div>";
					            	$i++;
					                }
					                if ($i == 10) {
					                	break;
					                }
					            }
					        ?>
