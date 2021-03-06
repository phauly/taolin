<?php
/**
  * This file is part of taolin project (http://taolin.fbk.eu)
  * Copyright (C) 2008, 2009 FBK Foundation, (http://www.fbk.eu)
  * Authors: SoNet Group (see AUTHORS.txt)
  *
  * Taolin is free software: you can redistribute it and/or modify
  * it under the terms of the GNU Affero General Public License as published by
  * the Free Software Foundation version 3 of the License.
  *
  * Taolin is distributed in the hope that it will be useful,
  * but WITHOUT ANY WARRANTY; without even the implied warranty of
  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  * GNU Affero General Public License for more details.
  *
  * You should have received a copy of the GNU Affero General Public License
  * along with Taolin. If not, see <http://www.gnu.org/licenses/>.
  *
  */
?>

<?php

if (!$_POST['url'])
    die('URL requested');
else $url = $_POST['url'];

if ($_POST['xslt'])
    $xslt_file = $_POST['xslt'];

// Allocate a new XSLT processor
$xp = new XsltProcessor();
$xsl = new DomDocument;
$xsl->load($xslt_file);

$xp->importStylesheet($xsl);

$xml_doc = new DomDocument;
$xml_doc->load($url);

if ($html = $xp->transformToXML($xml_doc)) {
      echo $html;
  } else {
      trigger_error('XSL transformation failed.', E_USER_ERROR);
  }  

?>
