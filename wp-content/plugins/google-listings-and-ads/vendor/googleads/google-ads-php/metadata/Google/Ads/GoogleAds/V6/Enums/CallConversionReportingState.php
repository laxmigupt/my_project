<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v6/enums/call_conversion_reporting_state.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V6\Enums;

class CallConversionReportingState
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
Cgoogle/ads/googleads/v6/enums/call_conversion_reporting_state.protogoogle.ads.googleads.v6.enums"�
 CallConversionReportingStateEnum"�
CallConversionReportingState
UNSPECIFIED 
UNKNOWN
DISABLED,
(USE_ACCOUNT_LEVEL_CALL_CONVERSION_ACTION-
)USE_RESOURCE_LEVEL_CALL_CONVERSION_ACTIONB�
!com.google.ads.googleads.v6.enumsB!CallConversionReportingStateProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v6/enums;enums�GAA�Google.Ads.GoogleAds.V6.Enums�Google\\Ads\\GoogleAds\\V6\\Enums�!Google::Ads::GoogleAds::V6::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

