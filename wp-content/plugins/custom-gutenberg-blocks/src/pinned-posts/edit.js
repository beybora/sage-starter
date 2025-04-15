import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, CheckboxControl, Button, Popover } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useState } from '@wordpress/element';

export default function Edit({ attributes, setAttributes }) {
	const { headline, subheadline, pinnedPosts } = attributes;
	const [editingPostId, setEditingPostId] = useState(null);

	const posts = useSelect((select) => {
		return select('core').getEntityRecords('postType', 'post', { per_page: 10 });
	}, []);

	const togglePost = (post) => {
		const postExists = pinnedPosts.some(item => item.id === post.id);

		if (postExists) {
			// Entferne den Post
			setAttributes({
				pinnedPosts: pinnedPosts.filter(item => item.id !== post.id)
			});
		} else if (pinnedPosts.length < 3) {
			// Füge Post mit ID, Slug, Title und leeren Feldern für Kategorie und Beschreibung hinzu
			setAttributes({
				pinnedPosts: [
					...pinnedPosts,
					{
						id: post.id,
						slug: post.slug,
						title: post.title.rendered,
						category: '',
						description: ''
					}
				]
			});
		}
	};

	const updatePostMeta = (postId, field, value) => {
		setAttributes({
			pinnedPosts: pinnedPosts.map(post =>
				post.id === postId ? { ...post, [field]: value } : post
			)
		});
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title="Einstellungen">
					<TextControl
						label="Überschrift"
						value={headline}
						onChange={(val) => setAttributes({ headline: val })}
					/>
					<TextControl
						label="Subheadline"
						value={subheadline}
						onChange={(val) => setAttributes({ subheadline: val })}
					/>
				</PanelBody>
				<PanelBody title="Beiträge auswählen" initialOpen={true}>
					{posts?.map((post) => (
						<CheckboxControl
							key={post.id}
							label={post.title.rendered}
							checked={pinnedPosts.some(item => item.id === post.id)}
							onChange={() => togglePost(post)}
							disabled={!pinnedPosts.some(item => item.id === post.id) && pinnedPosts.length >= 3}
						/>
					))}
				</PanelBody>
			</InspectorControls>

			<div
				{...useBlockProps({
					className: 'editor-box',
					style: {
						border: '1px solid #ccc',
						backgroundColor: '#fafafa',
						borderRadius: '0.5rem',
						padding: '1.5rem',
						marginBottom: '1.5rem',
						boxShadow: '0 1px 3px rgba(0,0,0,0.05)',
					},
				})}
			>
				{/* Section Label */}
				<div style={{ fontWeight: 'bold', fontSize: '0.9rem', marginBottom: '1rem', color: '#374151' }}>
					Pinned Posts Section
				</div>

				{/* Headline */}
				<div style={{ marginBottom: '1rem', textAlign: 'center' }}>
					<RichText
						tagName="h2"
						value={headline}
						onChange={(val) => setAttributes({ headline: val })}
						placeholder="Überschrift eingeben"
						style={{
							fontSize: '1.875rem',
							fontWeight: '700',
							lineHeight: '1.2',
							marginBottom: '0.5rem',
						}}
					/>
				</div>

				{/* Subheadline */}
				<div style={{ marginBottom: '2rem', textAlign: 'center' }}>
					<RichText
						tagName="p"
						value={subheadline}
						onChange={(val) => setAttributes({ subheadline: val })}
						placeholder="Subheadline eingeben"
						style={{
							fontSize: '1.125rem',
							color: '#4b5563',
							lineHeight: '1.6',
							marginTop: '0.25rem',
						}}
					/>
				</div>

				{/* Post Preview (Editor only visual) */}
				<div
					style={{
						display: 'grid',
						gridTemplateColumns: 'repeat(auto-fit, minmax(300px, 1fr))',
						gap: '1.5rem',
					}}
				>
					{posts
						?.filter((post) => pinnedPosts.some(item => item.id === post.id))
						.map((post) => {
							const pinnedPost = pinnedPosts.find(item => item.id === post.id);
							return (
								<div
									key={post.id}
									style={{
										backgroundColor: '#e5e7eb',
										padding: '1rem',
										borderRadius: '0.75rem',
										textAlign: 'left',
									}}
								>
									<div style={{ display: 'flex', justifyContent: 'space-between', marginBottom: '1rem' }}>
										<strong>{post.title.rendered}</strong>
										<Button
											isSecondary
											isSmall
											onClick={() => setEditingPostId(editingPostId === post.id ? null : post.id)}
										>
											{editingPostId === post.id ? 'Schließen' : 'Bearbeiten'}
										</Button>
									</div>

									{editingPostId === post.id && (
										<div style={{ backgroundColor: 'white', padding: '1rem', borderRadius: '0.5rem', marginBottom: '1rem' }}>
											<TextControl
												label="Kategorie"
												value={pinnedPost.category || ''}
												onChange={(value) => updatePostMeta(post.id, 'category', value)}
												placeholder="Kategorie eingeben"
												style={{ marginBottom: '0.75rem' }}
											/>
											<TextControl
												label="Beschreibung"
												value={pinnedPost.description || ''}
												onChange={(value) => updatePostMeta(post.id, 'description', value)}
												placeholder="Kurze Beschreibung eingeben"
											/>
										</div>
									)}

									<div style={{ fontSize: '0.8rem', color: '#6b7280' }}>
										<div style={{ marginBottom: '0.25rem' }}>
											<strong>Slug:</strong> {post.slug}
										</div>
										{pinnedPost.category && (
											<div style={{ marginBottom: '0.25rem' }}>
												<strong>Kategorie:</strong> {pinnedPost.category}
											</div>
										)}
										{pinnedPost.description && (
											<div>
												<strong>Beschreibung:</strong> {pinnedPost.description}
											</div>
										)}
									</div>
								</div>
							);
						})}
				</div>

				{pinnedPosts.length === 0 && (
					<div style={{ textAlign: 'center', padding: '2rem', backgroundColor: '#f3f4f6', borderRadius: '0.5rem' }}>
						<p style={{ margin: 0, color: '#6b7280' }}>Bitte wähle Beiträge aus der Seitenleiste aus, um sie hier anzuzeigen.</p>
					</div>
				)}
			</div>
		</>
	);
}
