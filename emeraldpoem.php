<?php
/*
Plugin Name: Emerald's Poetry Collection
Plugin URI: http://emeraldraptor.com/programmer/diktsamling/
Description: A widget that displays random poem in Norwegian
Version: 1.0
Author: Emerald Raptor
Author URI: http://emeraldraptor.com/
License: GPL2
*/

add_action("plugins_loaded", "initEmeraldPoem");

function initEmeraldPoem(){
  register_sidebar_widget(__('Emeralds diktsamling'), 'displayEmeraldPoem');
}

function displayEmeraldPoem(){
  $emeraldPoem = new EmeraldPoem();
  $emeraldPoem->display();
}

class EmeraldPoem{
  var $poem;
  
  function EmeraldPoem(){
    $this->populate();
  }
  
  function display(){
    $output .= "<h3 class='widget-title'>".$this->poem['title']."</h2>";
    $output .= "<p>".nl2br($this->poem['text'])."</p>";
    $output .= "<p><em>av ".$this->poem['author']."</em></p>";
    
    print $output; 
  }
  
  function populate(){                        
    include("emeraldpoem.inc");
    $this->poem = $poems[array_rand($poems)];
  }
}

?>
