<?php
namespace metastore;

/**
 * Autogenerated by Thrift Compiler (0.13.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class ThriftHiveMetastore_set_ugi_args
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'user_name',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'group_names',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRING,
            'elem' => array(
                'type' => TType::STRING,
                ),
        ),
    );

    /**
     * @var string
     */
    public $user_name = null;
    /**
     * @var string[]
     */
    public $group_names = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['user_name'])) {
                $this->user_name = $vals['user_name'];
            }
            if (isset($vals['group_names'])) {
                $this->group_names = $vals['group_names'];
            }
        }
    }

    public function getName()
    {
        return 'ThriftHiveMetastore_set_ugi_args';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->user_name);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->group_names = array();
                        $_size1703 = 0;
                        $_etype1706 = 0;
                        $xfer += $input->readListBegin($_etype1706, $_size1703);
                        for ($_i1707 = 0; $_i1707 < $_size1703; ++$_i1707) {
                            $elem1708 = null;
                            $xfer += $input->readString($elem1708);
                            $this->group_names []= $elem1708;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('ThriftHiveMetastore_set_ugi_args');
        if ($this->user_name !== null) {
            $xfer += $output->writeFieldBegin('user_name', TType::STRING, 1);
            $xfer += $output->writeString($this->user_name);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->group_names !== null) {
            if (!is_array($this->group_names)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('group_names', TType::LST, 2);
            $output->writeListBegin(TType::STRING, count($this->group_names));
            foreach ($this->group_names as $iter1709) {
                $xfer += $output->writeString($iter1709);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}