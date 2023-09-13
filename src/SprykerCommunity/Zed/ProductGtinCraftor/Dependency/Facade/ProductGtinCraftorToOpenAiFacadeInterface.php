<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade;

interface ProductGtinCraftorToOpenAiFacadeInterface
{

    /**
     * @param \Generated\Shared\Transfer\OpenAiExecuteRequestTransfer $executeRequestTransfer
     *
     * @return \Generated\Shared\Transfer\OpenAiCreateResponseTransfer
     */
    public function executePromptAction(OpenAiExecuteRequestTransfer $executeRequestTransfer): OpenAiCreateResponseTransfer;

    /**
     * @return array|null
     */
    public function getOpenAiPromptToEventCollection(): ?array;

    /**
     * @param \Generated\Shared\Transfer\OpenAiPromptTransfer $openAiTransfer
     *
     * @return \Generated\Shared\Transfer\OpenAiPromptTransfer|null
     */
    public function updateOpenAi(OpenAiPromptTransfer $openAiTransfer): ?OpenAiPromptTransfer;

    /**
     * @param \Generated\Shared\Transfer\OpenAiPromptTransfer $openAiTransfer
     *
     * @return \Generated\Shared\Transfer\OpenAiPromptTransfer|null
     */
    public function createOpenAi(OpenAiPromptTransfer $openAiTransfer): ?OpenAiPromptTransfer;

    /**
     * @param \Generated\Shared\Transfer\OpenAiPromptCriteriaTransfer $openAiPromptCriteriaTransfer
     *
     * @return array|null
     */
    public function getOpenAiPromptCollection(OpenAiPromptCriteriaTransfer $openAiPromptCriteriaTransfer): ?array;

    /**
     * @param int $idOpenAi
     *
     * @return \Generated\Shared\Transfer\OpenAiPromptTransfer|null
     */
    public function findByOpenAiPromptById(int $idOpenAi): ?OpenAiPromptTransfer;

    /**
     * @param \Generated\Shared\Transfer\OpenAiAssignEventToPromptRequestTransfer $assignEventToPromptRequestTransfer
     *
     * @return bool
     */
    public function assignEventToPrompt(OpenAiAssignEventToPromptRequestTransfer $assignEventToPromptRequestTransfer): bool;

    /**
     * @param int $idOpenAi
     *
     * @return bool
     */
    public function deleteOpenAi(int $idOpenAi): bool;
}