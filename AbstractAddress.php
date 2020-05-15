<?php

interface AbstractAddress
{
    function getUrl($url);

    function normalizeResponse($response);
}