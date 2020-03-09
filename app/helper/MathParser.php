<?php


namespace App\helper;


use SplQueue;

class MathParser
{
    protected $variables = array();

    public function __construct($variables)
    {

        $this->variables = $variables;
    }

    public function evaluate($string)
    {
        return $this->parse($string);

//        return $this->run($stack);
    }

    public function parse($string)
    {
        $tokens = $this->tokenize($string);
//        return $tokens;
        $output = new SplQueue();
        $operators = new SplQueue();
        foreach ($tokens as $token) {
            $token = $this->extractVariables($token);
//            echo $token;
            $output->push($token);
            $expression = TerminalExpression::factory($token);
            if ($expression->isOperator()) {
                $this->parseOperator($expression, $output, $operators);
            } elseif ($expression->isParenthesis()) {
                $this->parseParenthesis($expression, $output, $operators);
            } else {
                $output->push($expression);
            }
        }
        while (($op = $operators->pop())) {
            if ($op->isParenthesis()) {
                throw new \RuntimeException('Mismatched Parenthesis');
            }
            $output->push($op);
        }

        return $output;
    }

    public function registerVariable($name, $value)
    {
        $this->variables[$name] = $value;
    }

    public function run(Stack $stack)
    {
        while (($operator = $stack->pop()) && $operator->isOperator()) {
            $value = $operator->operate($stack);
            if (!is_null($value)) {
                $stack->push(TerminalExpression::factory($value));
            }
        }

        return $operator ? $operator->render() : $this->render($stack);
    }

    public function extractVariables($token)
    {
        if ($token[0] == '$') {
            $key = substr($token, 1);

            return isset($this->variables[$key]) ? $this->variables[$key] : 0;
        }

        return $token;
    }

    protected function render(Stack $stack)
    {
        $output = '';
        while (($el = $stack->pop())) {
            $output .= $el->render();
        }
        if ($output) {
            return $output;
        }
        throw new \RuntimeException('Could not render output');
    }

    protected function parseParenthesis(TerminalExpression $expression, Stack $output, Stack $operators)
    {
        if ($expression->isOpen()) {
            $operators->push($expression);
        } else {
            $clean = false;
            while (($end = $operators->pop())) {
                if ($end->isParenthesis()) {
                    $clean = true;
                    break;
                } else {
                    $output->push($end);
                }
            }
            if (!$clean) {
                throw new \RuntimeException('Mismatched Parenthesis');
            }
        }
    }

    protected function parseOperator(TerminalExpression $expression, Stack $output, Stack $operators)
    {
        $end = $operators->poke();
        if (!$end) {
            $operators->push($expression);
        } elseif ($end->isOperator()) {
            do {
                if ($expression->isLeftAssoc() && $expression->getPrecedence() <= $end->getPrecedence()) {
                    $output->push($operators->pop());
                } elseif (!$expression->isLeftAssoc() && $expression->getPrecedence() < $end->getPrecedence()) {
                    $output->push($operators->pop());
                } else {
                    break;
                }
            } while (($end = $operators->poke()) && $end->isOperator());
            $operators->push($expression);
        } else {
            $operators->push($expression);
        }
    }

    public function tokenize($string)
    {
        $parts = preg_split('((\d+\.?\d+|\+|-|\(|\)|\*|/)|\s+)', $string, null, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $parts = array_map('trim', $parts);
        foreach ($parts as $key => &$value) {
            //if this is the first token or we've already had an operator or open paren, this is unary
            if ($value == '-') {
                if ($key - 1 < 0 || in_array($parts[$key - 1], array('+', '-', '*', '/', '('))) {
                    $value = 'u';
                }
            }
        }

        return $parts;
    }
}
