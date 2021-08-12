<?php
require 'vendor/autoload.php';

$sdkKey = "sdk-46053a79-b3df-4b52-b095-9a1a3e00703d";

$featureFlagKey = "pricing-tier-3";

if (!$sdkKey) {
  echo "*** Please $sdkKey first\n\n";
  exit(1);
}

$client = new LaunchDarkly\LDClient($sdkKey);

$user = (new LaunchDarkly\LDUserBuilder("bgomes@launchdarkly.com"))
  ->name("bgomes")
  ->build();

$flagValue = $client->variation($featureFlagKey, $user, false);
$flagValueStr = $flagValue ? 'true' : 'false';

echo "*** Feature flag '{$featureFlagKey}' is {$flagValueStr} for this user\n\n";

?>

