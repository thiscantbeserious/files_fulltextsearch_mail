<template>
    <!--
    SPDX-FileCopyrightText: Simon Sanladerer <simon@sanladerer.com>
    SPDX-License-Identifier: AGPL-3.0-or-later
    -->
	<Content :class="{'icon-loading': loading}" app-name="files_fulltextsearch_mail">
		<AppNavigation>
			<!-- <AppNavigationNew v-if="!loading"
				:text="t('files_fulltextsearch_mail', 'New note')"
				:disabled="false"
				button-id="new-filesfulltextsearchmail-button"
				button-class="icon-add"
				@click="newNote" />
			<ul>
				<AppNavigationItem v-for="note in notes"
					:key="note.id"
					:title="note.title ? note.title : t('files_fulltextsearch_mail', 'New note')"
					:class="{active: currentNoteId === note.id}"
					@click="openNote(note)">
					<template slot="actions">
						<ActionButton v-if="note.id === -1"
							icon="icon-close"
							@click="cancelNewNote(note)">
							{{
							t('filesfulltextsearchmail', 'Cancel note creation') }}
						</ActionButton>
						<ActionButton v-else
							icon="icon-delete"
							@click="deleteNote(note)">
							{{
							 t('filesfulltextsearchmail', 'Delete note') }}
						</ActionButton>
					</template>
				</AppNavigationItem>
			</ul> -->
		</AppNavigation>
		<AppContent>
			<!-- <div v-if="currentNote">
				<input ref="title"
					v-model="currentNote.title"
					type="text"
					:disabled="updating">
				<textarea ref="content" v-model="currentNote.content" :disabled="updating" />
				<input type="button"
					class="primary"
					:value="t('filesfulltextsearchmail', 'Save')"
					:disabled="updating || !savePossible"
					@click="saveNote">
			</div>
			<div v-else id="emptycontent">
				<div class="icon-file" />
				<h2>{{
				 t('filesfulltextsearchmail', 'Create a note to get started') }}</h2>
			</div> -->
		</AppContent>
	</Content>
</template>

<script>
import Content from '@nextcloud/vue/dist/Components/Content'
import ActionButton from '@nextcloud/vue/dist/Components/ActionButton'
import AppContent from '@nextcloud/vue/dist/Components/AppContent'
import AppNavigation from '@nextcloud/vue/dist/Components/AppNavigation'
import AppNavigationItem from '@nextcloud/vue/dist/Components/AppNavigationItem'
import AppNavigationNew from '@nextcloud/vue/dist/Components/AppNavigationNew'

import '@nextcloud/dialogs/styles/toast.scss'
import { generateUrl } from '@nextcloud/router'
import { showError, showSuccess } from '@nextcloud/dialogs'
import axios from '@nextcloud/axios'

export default {
	name: 'App',
	components: {
		Content,
		ActionButton,
		AppContent,
		AppNavigation,
		AppNavigationItem,
		AppNavigationNew,
	},
	data() {
		return {
			updating: false,
			loading: true,
		}
	},
	computed: {},
	/**
	 * Fetch list of notes when the component is loaded
	 */
	async mounted() {
		try {
			// const response = await axios.get(generateUrl('/apps/filesfulltextsearchmail/notes'))
			// this.notes = response.data
		} catch (e) {
			console.error(e)
			// showError(t('notestutorial', 'Could not fetch notes'))
		}
		this.loading = false
	},

	methods: {},
}
</script>
<style scoped>
	#app-content > div {
		width: 100%;
		height: 100%;
		padding: 20px;
		display: flex;
		flex-direction: column;
		flex-grow: 1;
	}

	input[type='text'] {
		width: 100%;
	}

	textarea {
		flex-grow: 1;
		width: 100%;
	}
</style>
