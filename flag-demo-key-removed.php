<?php
require 'vendor/autoload.php';

$sdkKey = "";

$featureFlagKey = "pricing-tier-3";

if (!$sdkKey) {
  echo "*** Please $sdkKey first\n\n";
  exit(1);
}

$client = new LaunchDarkly\LDClient($sdkKey);

$user = (new LaunchDarkly\LDUserBuilder("test@company.com"))
  ->name("bgomes")
  ->build();

$flagValue = $client->variation($featureFlagKey, $user, false);
$flagValueStr = $flagValue ? 'true' : 'false';

echo "*** Feature flag '{$featureFlagKey}' is {$flagValueStr} for this user\n\n";

?>

