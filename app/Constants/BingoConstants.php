<?php
namespace App\Constants;

class BingoConstants 
{
  public const TABLE_NAME = 't_bingo';
  public const PK = 'bingo_no';
  public const BINGO_ITEM = 'bingo_item';
  public const CROSSED_OUT = 'crossed_out';
  public const BINGO_DRAW = 'bingo_draw';
  public const DEFAULT_RELATIONSHIP = [
    'bingoItems', 
    'bingoDraws',
    'crossedOut'
  ];
}