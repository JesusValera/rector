<?php

namespace RectorPrefix20210719;

if (\class_exists('Tx_Extbase_Configuration_Exception_NoSuchFile')) {
    return;
}
class Tx_Extbase_Configuration_Exception_NoSuchFile
{
}
\class_alias('Tx_Extbase_Configuration_Exception_NoSuchFile', 'Tx_Extbase_Configuration_Exception_NoSuchFile', \false);
