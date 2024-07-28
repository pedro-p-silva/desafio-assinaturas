<?php

function addAnotherTenDays(): string
{
    return date('Y-m-d', strtotime('+ 10 days', strtotime(now())));
}
