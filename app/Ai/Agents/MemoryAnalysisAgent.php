<?php

namespace App\Ai\Agents;

use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasStructuredOutput;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;

class MemoryAnalysisAgent implements Agent, Conversational, HasStructuredOutput, HasTools
{
    use Promptable;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return <<<TEXT
You are a memory extraction system for a personal AI assistant.

Your task is to analyze user-provided text about a person and extract structured factual information.

Rules:
- Extract ONLY explicit or strongly implied facts.
- Do NOT guess or invent information.
- Focus on personal preferences, dislikes, dreams, habits, emotions, and relationships.
- Each fact must belong to one of these types:
  - preference
  - dislike
  - dream
  - habit
  - emotion
  - personal_info
- The "attribute" field must describe the category of the fact (e.g. music, food, travel, personality).
- The "value" must be the extracted entity or statement.
- If information is uncertain, do not include it.
- Return multiple facts if multiple pieces of information exist in the text.
- Do not return explanations, only structured facts.

Example input:
"She loves Coldplay, hates spicy food, and wants to visit Japan."

Expected output:
- preference / music / Coldplay
- dislike / food / spicy food
- dream / travel / Japan
TEXT;
    }

    /**
     * Get the list of messages comprising the conversation so far.
     *
     * @return Message[]
     */
    public function messages(): iterable
    {
        return [];
    }

    /**
     * Get the tools available to the agent.
     *
     * @return Tool[]
     */
    public function tools(): iterable
    {
        return [];
    }

    /**
     * Get the agent's structured output schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'facts' => $schema->array()
                ->items(
                    $schema->object([
                        'type' => $schema->string()->required(),
                        'attribute' => $schema->string()->required(),
                        'value' => $schema->string()->required(),
                    ])
                )
                ->required(),
        ];
    }
}
