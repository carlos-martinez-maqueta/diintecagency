<?php
require_once __DIR__ . '/../dashboard/config/conexion.php';
require_once __DIR__ . '/../dashboard/class/Site.php';

$hero = Site::getHero();
$heroChips = Site::getHeroChips();
$featureCards = Site::getFeatureCards();
$ctaBlock = Site::getCtaBlock();
$locations = Site::getLocations();
$clients = Site::getClients();
$trustBrands = Site::getTrustBrands();
$secFeatures = Site::getSection('features');
$secMap = Site::getSection('map');
$secTrust = Site::getSection('trust');
$secClients = Site::getSection('clients');
