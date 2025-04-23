import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import { useSelect } from '@wordpress/data';

const variants = [
	{ label: 'Light', value: 'light' },
	{ label: 'Dark', value: 'dark' },
	{ label: 'Light Gray', value: 'light-gray' },
];

export default function Edit({ attributes, setAttributes }) {
	const { pinnedPost1, pinnedPost2, variant } = attributes;

	const { posts, isLoading } = useSelect((select) => {
		const data = select('core');
		const types = ['post', 'press_release', 'event'];
		let allPosts = [];
		types.forEach((type) => {
			const records = data.getEntityRecords('postType', type, { per_page: -1 }) || [];
			allPosts = allPosts.concat(records);
		});
		return {
			posts: allPosts,
			isLoading: types.some((type) =>
				data.isResolving('core', 'getEntityRecords', ['postType', type, { per_page: -1 }])
			),
		};
	}, []);

	const postOptions = posts
		? posts.map((post) => ({ label: post.title.rendered, value: post.id }))
		: [];

	return (
		<>
			<InspectorControls>
				<PanelBody title="Gepinnte Beiträge">
					<SelectControl
						label="Erster Beitrag"
						value={pinnedPost1}
						options={[{ label: '– auswählen –', value: '' }, ...postOptions]}
						onChange={(val) => setAttributes({ pinnedPost1: parseInt(val) })}
						disabled={isLoading}
					/>
					<SelectControl
						label="Zweiter Beitrag"
						value={pinnedPost2}
						options={[{ label: '– auswählen –', value: '' }, ...postOptions]}
						onChange={(val) => setAttributes({ pinnedPost2: parseInt(val) })}
						disabled={isLoading}
					/>
					<SelectControl
						label="Variante"
						value={variant}
						options={variants}
						onChange={(val) => setAttributes({ variant: val })}
					/>
				</PanelBody>
			</InspectorControls>

			<div
				{...useBlockProps({ className: 'editor-box' })}
				style={{
					padding: '2rem',
					border: '1px dashed #ccc',
					textAlign: 'center',
					backgroundColor:
						variant === 'dark' ? '#E30C17' : variant === 'light-gray' ? '#E0E0E0' : '#FAFAFA',
					color: variant === 'dark' ? '#fff' : '#1A1A1A',
				}}
			>
				<p style={{ fontSize: '1rem', fontWeight: '500' }}>Zwei Beiträge werden hier angezeigt.</p>
				<p style={{ fontSize: '0.875rem', color: variant === 'dark' ? '#fff' : '#666' }}>
					Diese Beiträge erscheinen als "gepinnt".
				</p>
			</div>
		</>
	);
}
