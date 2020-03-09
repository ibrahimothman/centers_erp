<?php

/*
 * The PHP Math Parser library
 *
 * @author     Anthony Ferrara <ircmaxell@ircmaxell.com>
 * @copyright  2011 The Authors
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    Build @@version@@
 */
namespace App\helper\mathParser\Expressions;

use App\helper\mathParser\Stack;
use App\helper\mathParser\TerminalExpression;

class Number extends TerminalExpression
{
    public function operate(Stack $stack)
    {
        return $this->value;
    }
}
